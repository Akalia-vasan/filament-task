<?php

namespace App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\ProductType;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    public function create(bool $another = false): void
    {
        $this->callHook('beforeValidate');
        $data = $this->form->getState();
        $this->callHook('afterValidate');

        $this->callHook('beforeCreate');
        $rawState = $this->form->getRawState();
        $product = new Product();

        $product->name = $rawState['name'] ?? '';
        $product->description = $rawState['description'] ?? '';
        $product->color_id = $rawState['color_id'] ?? '';
        $product->category_id = $rawState['category_id'] ?? '';
        $product->save();

        if (!empty($rawState['product_types'])) {
            foreach ($rawState['product_types'] as $key => $itemData) {
                $type = ProductType::create([
                'name' => $itemData['name'] ?? '',
                'bouns_number' => $itemData['bouns_number'] ?? '',
                ]);

                $product->productTypes()->create([
                'product_type_id' => $type->id ?? '',
                ]);
            }
        }
        $this->product = $product;
        $this->callHook('afterCreate');
        $this->redirect($this->getRedirectUrl());
    }

    protected function getRedirectUrl(): string
        {
            return $this->getResource()::getUrl('index');
        }
}
