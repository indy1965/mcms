<?php

use Engine\Service\ConfigService;
use Engine\Service\DBService;
use Engine\Service\RouterService;
use Engine\Service\ViewService;

return [
  DBService::class,
  RouterService::class,
  ViewService::class,
  ConfigService::class,
];
