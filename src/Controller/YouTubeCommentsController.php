<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\YouTubeComment;
use App\Model\Table\YouTubeCommentsTable;
use App\Service\GoogleObjectToEntities;
use App\Service\YouTubeApi;
use App\View\JsonPlusView;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\JsonView;

/**
 * YouTubeComments Controller
 *
 * @property YouTubeCommentsTable $YouTubeComments
 * @property YouTubeApi $YouTubeApi
 *
 * @method YouTubeComment[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class YouTubeCommentsController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'order' => [
            'published' => 'desc',
        ],
    ];

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setClassName(JsonPlusView::class);
        $this->YouTubeApi = YouTubeApi::getInstance();
    }

    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index(?int $video_id = null)
    {
        $this->getRequest()->allowMethod('get');
        if (!$video_id) throw new NotFoundException();
        $video = $this->YouTubeComments->YouTubeVideos->get($video_id);
        $result = $this->YouTubeApi->getVideoCommentThreads($video->uid);
        GoogleObjectToEntities::commentThreadListResponseToYouTubeComments($result);
        $query = $this->YouTubeComments
            ->find()
            ->where([
                'you_tube_video_id' => $video_id,
            ])
            ->contain([
                'YouTubeCommentAuthors',
                'ChildYouTubeComments' => ['YouTubeCommentAuthors'],
            ]);

        $youTubeComments = $this->paginate($query);

        $this->set(compact('youTubeComments'));
    }
}
