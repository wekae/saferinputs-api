<?php

namespace App\Listeners;

use App\Events\MediaUpdated;
use App\Services\Cms\MediaService;
use App\Services\Cms\PostsService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdatePostToken
{

    private $postService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PostsService $postsService, MediaService $mediaService)
    {
        $this->postService = $postsService;
        $this->mediaService = $mediaService;
    }

    /**
     * Handle the event.
     *
     * @param  MediaUpdated  $event
     * @return void
     */
    public function handle(MediaUpdated $event)
    {
        $oldToken = $event->oldToken;
        $newToken = $event->newToken;

        // Find post that contains the token
        Log::debug("Updating Post Token ".$oldToken." to ".$newToken);
        $result = $this->postService->findByToken($oldToken);
        if($result["status"]){
            // Post found
            $post = $result["post"];
            $this->postService->updateToken($post, $newToken);
        }
    }
}
