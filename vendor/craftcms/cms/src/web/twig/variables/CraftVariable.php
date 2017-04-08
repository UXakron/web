<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\web\twig\variables;

use Craft;
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\db\AssetQuery;
use craft\elements\db\CategoryQuery;
use craft\elements\db\EntryQuery;
use craft\elements\db\MatrixBlockQuery;
use craft\elements\db\TagQuery;
use craft\elements\db\UserQuery;
use craft\elements\Entry;
use craft\elements\MatrixBlock;
use craft\elements\Tag;
use craft\elements\User;
use yii\di\ServiceLocator;

/**
 * Craft defines the `craft` global template variable.
 *
 * @property Config          $config
 * @property ElementIndexes  $elementIndexes
 * @property CategoryGroups  $categoryGroups
 * @property Cp              $cp
 * @property Deprecator      $deprecator
 * @property Fields          $fields
 * @property Feeds           $feeds
 * @property Globals         $globals
 * @property Request         $request
 * @property Routes          $routes
 * @property Sections        $sections
 * @property SystemSettings  $systemSettings
 * @property Tasks           $tasks
 * @property UserSession     $session
 * @property I18n            $i18n
 * @property Io              $io
 * @property UserGroups      $userGroups
 * @property UserPermissions $userPermissions
 * @property EmailMessages   $emailMessages
 * @property EntryRevisions  $entryRevisions
 * @property Rebrand         $rebrand
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class CraftVariable extends ServiceLocator
{
    // Properties
    // =========================================================================

    /**
     * @var \craft\web\Application|\craft\console\Application|null The Craft application class
     */
    public $app;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    {
        // Set the core components
        /** @noinspection PhpDeprecationInspection */
        $config['components'] = [
            'cp' => Cp::class,
            'io' => Io::class,
            'routes' => Routes::class,

            // Deprecated
            'categoryGroups' => CategoryGroups::class,
            'config' => Config::class,
            'deprecator' => Deprecator::class,
            'elementIndexes' => ElementIndexes::class,
            'entryRevisions' => EntryRevisions::class,
            'feeds' => Feeds::class,
            'fields' => Fields::class,
            'globals' => Globals::class,
            'i18n' => I18N::class,
            'request' => Request::class,
            'sections' => Sections::class,
            'systemSettings' => SystemSettings::class,
            'tasks' => Tasks::class,
            'session' => UserSession::class,
        ];

        switch (Craft::$app->getEdition()) {
            case Craft::Pro:
                /** @noinspection PhpDeprecationInspection */
                $config['components'] = array_merge($config['components'], [
                    // Deprecated
                    'userGroups' => UserGroups::class,
                ]);
            // no break
            case Craft::Client:
                /** @noinspection PhpDeprecationInspection */
                /** @noinspection SuspiciousAssignmentsInspection */
                $config['components'] = array_merge($config['components'], [
                    'rebrand' => Rebrand::class,

                    // Deprecated
                    'emailMessages' => EmailMessages::class,
                    'userPermissions' => UserPermissions::class,
                ]);
        }

        // Add plugin components
        foreach (Craft::$app->getPlugins()->getAllPlugins() as $handle => $plugin) {
            if (!isset($config['components'][$handle])) {
                $component = $plugin->defineTemplateComponent();

                if ($component !== null) {
                    $config['components'][$handle] = $component;
                }
            }
        }

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->app = Craft::$app;
    }

    /**
     * @inheritdoc
     */
    public function __call($name, $params)
    {
        // Are they calling one of the components as if it's still a function?
        if ($params === [] && $this->has($name)) {
            Craft::$app->getDeprecator()->log("CraftVariable::{$name}()", "craft.{$name}() is no longer a function. Use “craft.{$name}” instead (without the parentheses).");

            return $this->get($name);
        }

        return parent::__call($name, $params);
    }

    // General info
    // -------------------------------------------------------------------------

    /**
     * @inheritdoc
     */
    public function canGetProperty($name, $checkVars = true, $checkBehaviors = true)
    {
        // Check the services
        if ($this->has($name)) {
            return true;
        }

        return parent::canGetProperty($name, $checkVars, $checkBehaviors);
    }

    /**
     * Gets the current language in use.
     *
     * @return string
     * @deprecated in 3.0
     */
    public function locale(): string
    {
        Craft::$app->getDeprecator()->log('craft.locale()', 'craft.locale() has been deprecated. Use craft.app.language instead.');

        return Craft::$app->language;
    }

    /**
     * Returns whether this site has multiple locales.
     *
     * @return bool
     * @deprecated in 3.0. Use craft.app.isMultiSite instead
     */
    public function isLocalized(): bool
    {
        Craft::$app->getDeprecator()->log('craft.isLocalized', 'craft.isLocalized has been deprecated. Use craft.app.isMultiSite instead.');

        return Craft::$app->getIsMultiSite();
    }

    // Element queries
    // -------------------------------------------------------------------------

    /**
     * Returns a new AssetQuery instance.
     *
     * @param mixed $criteria
     *
     * @return AssetQuery
     */
    public function assets($criteria = null): AssetQuery
    {
        $query = Asset::find();
        if ($criteria) {
            Craft::configure($query, $criteria);
        }

        return $query;
    }

    /**
     * Returns a new CategoryQuery instance.
     *
     * @param mixed $criteria
     *
     * @return CategoryQuery
     */
    public function categories($criteria = null): CategoryQuery
    {
        $query = Category::find();
        if ($criteria) {
            Craft::configure($query, $criteria);
        }

        return $query;
    }

    /**
     * Returns a new EntryQuery instance.
     *
     * @param mixed $criteria
     *
     * @return EntryQuery
     */
    public function entries($criteria = null): EntryQuery
    {
        $query = Entry::find();
        if ($criteria) {
            Craft::configure($query, $criteria);
        }

        return $query;
    }

    /**
     * Returns a new MatrixBlockQuery instance.
     *
     * @param mixed $criteria
     *
     * @return MatrixBlockQuery
     */
    public function matrixBlocks($criteria = null): MatrixBlockQuery
    {
        $query = MatrixBlock::find();
        if ($criteria) {
            Craft::configure($query, $criteria);
        }

        return $query;
    }

    /**
     * Returns a new TagQuery instance.
     *
     * @param mixed $criteria
     *
     * @return TagQuery
     */
    public function tags($criteria = null): TagQuery
    {
        $query = Tag::find();
        if ($criteria) {
            Craft::configure($query, $criteria);
        }

        return $query;
    }

    /**
     * Returns a new UserQuery instance
     *
     * @param mixed $criteria
     *
     * @return UserQuery
     */
    public function users($criteria = null): UserQuery
    {
        $query = User::find();
        if ($criteria) {
            Craft::configure($query, $criteria);
        }

        return $query;
    }
}
