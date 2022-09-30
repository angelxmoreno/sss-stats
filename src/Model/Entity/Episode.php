<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Episode Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property int|null $you_tube_video_id
 * @property string $episode_number
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property YouTubeVideo $you_tube_video
 * @property EpisodeAttributeValue[] $episode_attribute_values
 * @property EpisodeSnack[] $episode_snacks
 * @property Snack[] $snacks
 * @property Film[] $films
 */
class Episode extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'you_tube_video_id' => true,
        'episode_number' => true,
        'created' => true,
        'modified' => true,
        'you_tube_video' => true,
        'episode_attribute_values' => true,
        'episode_snacks' => true,
        'snacks' => true,
        'films' => true,
    ];

    protected $_virtual = ['name', 'title'];

    protected function _getName(): ?string
    {
        return is_null($this->episode_number)
            ? null
            : '#' . $this->episode_number;
    }

    protected function _getTitle(): ?string
    {
        return is_null($this->you_tube_video)
            ? null
            : trim(preg_replace('/\[SSS #[^\]]+\]/', '', $this->you_tube_video->title));
    }

}
