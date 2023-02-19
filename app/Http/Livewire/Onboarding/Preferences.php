<?php

namespace App\Http\Livewire\Onboarding;

use Livewire\Component;
use App\Enums\OnboardingStepEnum;
use App\Models\Tag;
use App\Models\TagUserRating;

class Preferences extends Component
{
    public $canSubmit = false;
    public $search = "";
    public $tags = null;
    public $selectedTags = [];

    protected $listeners = ['save' => 'save'];

    function removeTag($tag)
    {
        $this->selectedTags = array_filter($this->selectedTags, function ($t) use ($tag) {
            return $t !== $tag;
        });
    }

    function addTag($tag)
    {
        array_push($this->selectedTags, $tag);
    }

    function save()
    {
        foreach ($this->selectedTags as $tag) {
            TagUserRating::firstOrCreate([
                'user_id' => auth()->user()->id,
                'tag_id' => $tag
            ], [
                'rating' => 10
            ]);
        }

        $user = auth()->user();
        $user->onboarding_step = OnboardingStepEnum::FREINDS;
        $user->save();

        return redirect()->route('onboarding.friends');
    }

    public function render()
    {
        $this->canSubmit = count($this->selectedTags) > 4;
        $this->tags = Tag::where('name', 'like', '%' . $this->search . '%')
            ->withSum('ratings', 'rating')
            ->orderBy('ratings_sum_rating', 'DESC')
            ->take(5)->get();

        return view('livewire.onboarding.preferences')->with('canSubmit', $this->canSubmit);
    }
}
