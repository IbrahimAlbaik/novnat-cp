<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutResource;
use App\Http\Resources\FAQResource;
use App\Http\Resources\FeatureResource;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\GoalResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\StoryResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TechnologyResource;
use App\Models\About;
use App\Models\FAQ;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Goal;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Story;
use App\Models\Team;
use App\Models\Technology;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class APIsController extends Controller
{
    public function landingPage(): JsonResponse
    {
        try {
            $sliders = Slider::all();
            $technologies = Technology::all();
            $galleries = Gallery::all();
            $faqs = Faq::all();
            $teams = Team::all();
            $about = About::firstOrFail();
            $stories = Story::all();
            $partners = Partner::all();
            $goals = Goal::all();
            $features = Feature::all();

            return response()->json([
                'status' => true,
                'status_code' => 200,
                'message' => 'Data fetched successfully!..',
                'data' => [
                    'sliders' => SliderResource::collection($sliders),
                    'technologies' => TechnologyResource::collection($technologies),
                    'galleries' => GalleryResource::collection($galleries),
                    'faqs' => FAQResource::collection($faqs),
                    'teams' => TeamResource::collection($teams),
                    'about' => new AboutResource($about),
                    'stories' => StoryResource::collection($stories),
                    'partners' => PartnerResource::collection($partners),
                    'goals' => GoalResource::collection($goals),
                    'features' => FeatureResource::collection($features),
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching landing page data: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'status_code' => 500,
                'message' => 'Internal server error!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}
