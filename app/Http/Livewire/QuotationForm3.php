<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuotationForm3 extends Component
{
    public $successMessage;
    public $categories = [];

    public function addNameField()
    {
        $this->categories[] = [
            'category' => '',
            'items' => [
                [
                    'name' => '',
                    'description' => '',
                ]
            ]
        ];
    }

    public function removeNameField($index)
    {
        unset($this->categories[$index]);
        $this->categories = array_values($this->categories);
    }

    public function addItemField($index)
//    public function addNewField($index)
    {
        $this->categories[$index]['items'][] = [
            'name' => '',
            'description' => '',
        ];
    }

    public function removeItemField($index, $subIndex)
//    public function removeField($index, $subIndex)
    {
        unset($this->categories[$index]['items'][$subIndex]);
        $this->categories[$index]['items'] = array_values($this->categories[$index]['items']);
    }

    public function submit()
    {
        // Validate the form input
        $validatedData = $this->validate([
            'categories.*.category' => 'required',
            'categories.*.items.*.name' => 'required',
            'categories.*.items.*.description' => 'required',
        ], [
            'categories.*.items.*.description' => 'Please enter a item description.',
            'categories.*.category.required' => 'Please enter a category name.',
            'categories.*.items.*.name.required' => 'Please enter an item name.',
        ]);

        // Save the data to the database
        foreach ($this->categories as $category) {
            // Save the category
            $savedCategory = Category::create(['name' => $category['category']]);

            // Save the items for the category
            foreach ($category['items'] as $item) {
                Item::create([
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'category_id' => $savedCategory->id,
                ]);
            }
        }

        $this->successMessage = 'Data saved successfully!';
    }

    public function render()
    {
        return view('livewire.quotation-form3');
    }
}
