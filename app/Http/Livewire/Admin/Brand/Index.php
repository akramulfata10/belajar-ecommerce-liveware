<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
       
    protected $paginationTheme = 'bootstrap';
    
    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'status' => ['nullable'],
        ];
    }

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
    }

    public function storeBrand()
    {
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('message','brands added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function updateBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }


    public function deleteBrands($brand_id){
        $this->brand_id =  $brand_id;
    }

    public function destroyBrands(){
        $brand = Brand::findOrFail($this->brand_id);
        $brand->delete();
        session()->flash('message', 'deleted category successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editBrand(){

        $validateData = $this->validate();

        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('message','brands update successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal(){
        $this->resetInput();
    }

    public function openModal(){
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brand::orderBy('id','desc')->paginate(1);
        return view('livewire.admin.brand.index', ['brands' => $brands])
            ->extends('layouts.admin')
            ->section('content');
    }
}
