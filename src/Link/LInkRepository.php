<?php namespace Anomaly\NavigationModule\Link;

use Anomaly\NavigationModule\Group\Contract\GroupInterface;
use Anomaly\NavigationModule\Link\Contract\LinkRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class LinkRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\NavigationModule\Link
 */
class LinkRepository extends EntryRepository implements LinkRepositoryInterface
{

    /**
     * The link model.
     *
     * @var LinkModel
     */
    protected $model;

    /**
     * Create a new LinkRepository instance.
     *
     * @param LinkModel $model
     */
    public function __construct(LinkModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return links belonging to
     * the provided group.
     *
     * @param GroupInterface $group
     * @return LinkCollection
     */
    public function findAllByGroup(GroupInterface $group)
    {
        return $this->model->where('group_id', $group->getId())->get();
    }
}
