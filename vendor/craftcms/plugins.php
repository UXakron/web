<?php

$vendorDir = dirname(__DIR__);

return array (
  'rias/craft-width-fieldtype' => 
  array (
    'class' => 'rias\\widthfieldtype\\WidthFieldtype',
    'basePath' => $vendorDir . '/rias/craft-width-fieldtype/src',
    'handle' => 'width-fieldtype',
    'aliases' => 
    array (
      '@rias/widthfieldtype' => $vendorDir . '/rias/craft-width-fieldtype/src',
    ),
    'name' => 'Width Fieldtype',
    'version' => '1.0.0',
    'schemaVersion' => '1.0.0',
    'description' => 'Let users choose from predefined widths',
    'developer' => 'Rias',
    'developerUrl' => 'https://rias.be',
    'documentationUrl' => 'https://github.com/Rias500/width-fieldtype/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/Rias500/width-fieldtype/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'wbrowar/adminbar' => 
  array (
    'class' => 'wbrowar\\adminbar\\AdminBar',
    'basePath' => $vendorDir . '/wbrowar/adminbar/src',
    'handle' => 'admin-bar',
    'aliases' => 
    array (
      '@wbrowar/adminbar' => $vendorDir . '/wbrowar/adminbar/src',
    ),
    'name' => 'Admin Bar',
    'version' => 'v3.0.3',
    'schemaVersion' => '3.0.1',
    'description' => 'Front-end shortcuts for clients logged into Craft CMS.',
    'developer' => 'Will Browar',
    'developerUrl' => 'https://wbrowar.com/plugins/adminbar',
    'documentationUrl' => 'https://github.com/wbrowar/craft-3-adminbar/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/wbrowar/craft-3-adminbar/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'bar' => 'wbrowar\\adminbar\\services\\Bar',
      'editLinks' => 'wbrowar\\adminbar\\services\\EditLinks',
    ),
  ),
  'craftcms/redactor' => 
  array (
    'class' => 'craft\\redactor\\Plugin',
    'basePath' => $vendorDir . '/craftcms/redactor/src',
    'handle' => 'redactor',
    'aliases' => 
    array (
      '@craft/redactor' => $vendorDir . '/craftcms/redactor/src',
    ),
    'name' => 'Redactor',
    'version' => '1.0.1',
    'description' => 'Edit rich text content in Craft CMS using Redactor by Imperavi.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/redactor',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/redactor/master/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/redactor/archive/master.zip',
  ),
);
