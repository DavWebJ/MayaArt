<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ProductRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $product;
    public $hideForm;


    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];
    public function render()
    {
        $comments = Rating::where('product_id', $this->product->id)->where('status', 1)->with('user')->get();
        return view('livewire.product-ratings', compact('comments'))->layout('layouts.app');
    }

    public function mount()
    {

        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
                $this->hideForm = true;
                $this->reset('comment');
            }
            $this->reset('comment');
        }
        $this->reset('comment');
        return view('livewire.product-ratings',['hideForm' => $this->hideForm])->layout('layouts.app');
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
            $this->hideForm = false;
        }
    }

    public function rate()
    {
        $rating = Rating::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->product_id = $this->product->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 0;
            
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->comment = '';
            $this->reset('comment');
              Session::flash('success', 'Votre avis a bien été pris en compte et est en attente d\'approbation');
            return redirect()->route('shop.show',['slug'=>$this->product->slug]);

        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->product_id = $this->product->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 0;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
           
            $this->reset('comment');
            Session::flash('success', 'Votre avis a bien été pris en compte et est en attente d\'approbation');
           return redirect()->route('shop.show',['slug'=>$this->product->slug]);
           
        }
    }
}
