<?php


namespace App\Services\Cms;


use App\Enums\EntityAssociationEnum;
use App\Http\Requests\cms\MediaRequest;
use App\Http\Requests\cms\PostsRequest;
use App\Models\Cms\Posts;
use App\Repositories\Cms\PostsRepositoryMysqlImpl;
use App\Services\MediaFilesService;
use Illuminate\Http\Request;

class PostsService
{
    protected $postsRepository;
    protected $mediaFilesService;
    protected $entityService;
    protected $mediaService;

    public function __construct(PostsRepositoryMysqlImpl $postsRepository, MediaFilesService $mediaFilesService, EntityService $entityService, MediaService $mediaService)
    {
        $this->postsRepository = $postsRepository ;
        $this->mediaFilesService = $mediaFilesService ;
        $this->entityService = $entityService;
        $this->mediaService = $mediaService;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->postsRepository->all($attributes);
    }

    public function find($id){
        return $this->postsRepository->find($id);
    }
    public function findByToken($token){
        $post = $this->postsRepository->findByToken($token);
        if($post){
            return array(
                "status" => true,
                "post" => $post
            );
        }else{
            return array(
                "status" => false
            );
        }
    }
    public function findByYear($request){
        $attributes = array("request"=>$request);
        return $this->postsRepository->findByYear($attributes);
    }
    public function findByMonth($request){
        $attributes = array("request"=>$request);
        return $this->postsRepository->findByMonth($attributes);
    }
    public function findByYearAndMonth($request){
        $attributes = array("request"=>$request);
        return $this->postsRepository->findByYearAndMonth($attributes);
    }
    public function findDownloads(Request $request){
        $post = $this->postsRepository->find($request->post_id);
        if($post){
            $request->request->add(["entity_id" => $post->entity_id]);
            $request->request->remove("post_id");
            return $this->entityService->findDownloads($request);
        }
        return null;
    }
    public function findMedia(Request $request){
        $post = $this->postsRepository->find($request->post_id);
        if($post){
            $request->request->add(["entity_id" => $post->entity_id]);
            $request->request->remove("post_id");
            return $this->entityService->findMedia($request);
        }
        return null;
    }

    public function create(PostsRequest $request){
        $attributes = array("request" => $request);

        $item = $this->postsRepository->create($attributes);
        if($item){
            $this->entityService->associateToEntity($item, EntityAssociationEnum::POST_ASSOCIATION());

            // Upload the post image and update it's record
            if ($request->has('image')) {
                $image = $request->image;

                // Create request object to be used by the media service create method
                $mediaRequest = new MediaRequest();
                $mediaRequest->replace([
                    'name' => $item->name,
                    'description' => $item->summary,
                    'file' => $image
                ]);
                // Create new media object and upload image
                $mediaItem = $this->mediaService->create($mediaRequest);
                if($mediaItem){
                    // Upload and creation of database record successful
                    $attr = array("image_token" => $mediaItem->token);
                    // Update post record to include media token
                    $this->postsRepository->updateImageToken($item->id, $attr);
                    // Add the media record to the entity relation assigned to the post
                    $this->entityService->associateToExistingEntity($item->entity_id, $mediaItem, EntityAssociationEnum::MEDIA_ASSOCIATION());
                }

                // Set up the file name for the post's image
//                $extension = $this->mediaFilesService->fileExtension($image);
//                $token = $this->mediaFilesService->generateToken();
//                $fileName = $token . "." . $extension;
//
//                // Upload the post's image
//                $result = $this->mediaFilesService->saveMedia($image, $fileName, $year, $month);
//                if($result["status"]){
//                    // File uploaded, update record with token
//                    $attr = array("image_token" => $token);
//                    $this->postsRepository->updateImageToken($item->id, $attr);
//                }
            }

            $item->refresh();
        }
        return $item;
    }

    public function update(PostsRequest $request, $id){
        $attributes = array("request"=>$request);

        $item = $this->postsRepository->find($id);
        if($item){
            $this->entityService->createEntityIfNone($item, EntityAssociationEnum::POST_ASSOCIATION());
            return $this->postsRepository->update($id, $attributes);
        }else{
            return false;
        }
    }
    public function updateToken($post, $token){
        $attr = array("image_token" => $token);
        // Update post record to include the updated media token
        return $this->postsRepository->updateImageToken($post->id, $attr);
    }

    public function delete($id){
        return $this->postsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array('request'=>$request);
        return $this->postsRepository->filter($attributes);
    }

    public function findByTag(Request $request){
        $attributes = array('request'=>$request);
        return $this->postsRepository->findByTag($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->postsRepository->summaryCount($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->postsRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->postsRepository->datatable($attributes);
    }
}
