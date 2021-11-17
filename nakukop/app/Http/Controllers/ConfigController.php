<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nakukop\interfaces\application\configService\ConfigProviderInterface;
use Nakukop\interfaces\application\configService\ConfigServiceInterface;
use Nakukop\interfaces\infrastructure\logService\LogServiceInterface;

/**
 * Class ConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends BaseApiController
{
    protected LogServiceInterface $logService;

    protected ConfigServiceInterface $configService;

    /**
     * ConfigController constructor.
     * @param LogServiceInterface $logService
     * @param ConfigServiceInterface $configService
     */
    public function __construct(LogServiceInterface $logService, ConfigServiceInterface $configService)
    {
        $this->logService = $logService;
        $this->configService = $configService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return $this->sendResponse($this->configService->getAll());
        } catch (\Throwable $e) {

            $this->logService->log($e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * @param string $serviceSlug
     * @return JsonResponse
     */
    public function show(string $serviceSlug): JsonResponse
    {
        try {
            $configProvider = $this->configService->getProviderBySlug($serviceSlug);
            if (!$configProvider instanceof ConfigProviderInterface) {
                return $this->sendErrorByCode(Response::HTTP_NOT_FOUND);
            }

            return $this->sendResponse($configProvider->getAll());
        } catch (\Throwable $e) {

            $this->logService->log($e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * @param string $serviceSlug
     * @param Request $request
     * @return JsonResponse
     */
    public function update(string $serviceSlug, Request $request): JsonResponse
    {
        try {
            $configProvider = $this->configService->getProviderBySlug($serviceSlug);
            if (!$configProvider instanceof ConfigProviderInterface) {
                return $this->sendErrorByCode(Response::HTTP_NOT_FOUND);
            }

            return $this->sendResponse($configProvider->save(
                $configProvider->createModel($request->all())
            ));
        } catch (\Throwable $e) {

            $this->logService->log($e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
}
