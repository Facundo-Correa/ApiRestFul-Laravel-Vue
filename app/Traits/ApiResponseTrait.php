<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

/**
 * Class ApiResponseTrait
 *
 * @package App\Traits
 * @author Allan Kiezel <allan.kiezel@gmail.com>
 */
trait ApiResponseTrait
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection,
                               $searchable = true,
                               $sortable = true,
                               $filterable = true,
                               $code = 200)
    {
        if ($collection->isEmpty() || count($collection) == 0)
            return $this->successResponse(['data' => $collection], $code);

        if ($filterable) $collection = $this->filterData($collection);
        if ($searchable) $collection = $this->searchData($collection);
        if ($sortable) $collection = $this->sortData($collection);
        $collection = $this->paginate($collection);
        if (!env('APP_DEBUG')) $collection = $this->cacheResponse($collection);

        return $this->successResponse($collection, $code);
    }

    protected function showBoAll(Collection $collection,
                               $searchable = true,
                               $sortable = true,
                               $code = 200)
    {
        if ($collection->isEmpty() || count($collection) == 0)
            return $this->successResponse(['data' => $collection], $code);

        if ($searchable) $collection = $this->searchData($collection);
        if ($sortable) $collection = $this->sortDataBo($collection);
        $collection = $this->paginate($collection);
        if (!env('APP_DEBUG')) $collection = $this->cacheResponse($collection);

        return $this->successResponse($collection, $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponse(['data' => $instance], $code);
    }

    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }

    protected function showResponse($message, $code = 200)
    {
        return $this->successResponse($message, $code);
    }


    protected function filterData(Collection $collection)
    {
        foreach (request()->query() as $attribute => $value) {
            if (!in_array($attribute, ['search', 'sortBy', 'sortByDesc', 'per_page', 'page', 'date_col', 'zona_id', 'categoria_id', 'domicilio_id'])) {

                if ($attribute == 'price_from') {
                    $collection = $collection->where('precio_actual', '>=', request()->price_from);
                } elseif ($attribute == 'price_to') {
                    $collection = $collection->where('precio_actual', '<=', request()->price_to);
                } else {
                    $collection = $collection->where($attribute, $value);
                }
            }
        }
        return $collection;
    }

    protected function searchData(Collection $collection)
    {

        foreach (request()->query() as $attribute => $value) {

            if ($attribute == 'search' && $value != NULL ) {
                $keys = array_keys($collection[0]->getAttributes());

                $collection = $collection->filter(function ($item) use ($keys, $value) {
                    $valid = false;
                    foreach ($keys as $key) {
                        if (preg_match("/" . $value . "/i", $item->$key)) $valid = true;
                    }
                    return $valid;
                });

            }
        }

        return $collection;
    }

    protected function sortData(Collection $collection)
    {
        if (request()->has('sortBy')) {
            $collection = $collection->sortBy(request()->sortBy);
        }
        if (request()->has('sortByDesc')) {
            $collection = $collection->sortByDesc(request()->sortByDesc);
        }
        return $collection;
    }

    protected function sortDataBo(Collection $collection)
    {
        if (request()->has('column') ) {

            $collection = $collection->sortBy(request()->column);
            if(request()->dir == 'desc'){

                $collection = $collection->sortByDesc(request()->column);
            };

        }

        return $collection;
    }

    protected function paginate(Collection $collection)
    {
        $rules = [
            'per_page' => 'integer|min:2',
        ];

        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;
        if (request()->has('per_page')) {
            $perPage = (int)request()->per_page;
        }
        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }

    protected function cacheResponse($data)
    {
        $url = request()->url();
        $queryParams = request()->query();

        ksort($queryParams);

        $queryString = http_build_query($queryParams);

        $fullUrl = $url . "?" . $queryString;

        return Cache::remember($fullUrl, 30 / 60, function () use ($data) {
            return $data;
        });
    }
//    /**
//     * Resource was successfully created
//     *
//     * @param $data
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function createdResponse($data)
//    {
//        $response = $this->successEnvelope(201, $data, 'Created');
//
//        return response()->json($response, 201);
//    }
//
//    /**
//     * Resource was successfully deleted
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function deletedResponse()
//    {
//        $response = $this->successEnvelope(204, [], 'Deleted');
//
//        return response()->json($response, 204);
//    }
//
//    /**
//     * Returns general error
//     *
//     * @param $errors
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function errorResponse($errors)
//    {
//        $response = $this->errorEnvelope(400, $errors);
//
//        return response()->json($response, 400);
//    }
//
//    /**
//     * Client does not have proper permissions to perform action.
//     *
//     * @param $errors
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function insufficientPrivilegesResponse($errors)
//    {
//        $response = $this->errorEnvelope(403, $errors,
//            'Forbidden');
//
//        return response()->json($response, 403);
//    }
//
//    /**
//     * Returns a list of resources
//     *
//     * @param $data
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function listResponse($data)
//    {
//        $response = $this->successEnvelope(200, $data);
//
//        return response()->json($response);
//    }
//
//    /**
//     * Requested resource wasn't found
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function notFoundResponse()
//    {
//        $response = $this->errorEnvelope(404, [], 'Not Found');
//
//        return response()->json($response, 404);
//    }
//
//    /**
//     * Return information for single resource
//     *
//     * @param $data
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function showResponse($data)
//    {
//        $response = $this->successEnvelope(200, $data);
//
//        return response()->json($response);
//    }
//
//    /**
//     * Return error when request is properly formatted, but contains validation errors
//     *
//     * @param $errors
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function validationErrorResponse($errors)
//    {
//        $response = $this->errorEnvelope(422, $errors, 'Unprocessable Entity');
//
//        return response()->json($response, 422);
//    }
//
//    /**
//     * Standard error envelope structure
//     *
//     * @param int $status
//     * @param array $errors
//     * @param string $message
//     * @return array
//     */
//    private function errorEnvelope(
//        $status = 400,
//        $errors = [],
//        $message = 'Bad Request'
//    ) {
//        return [
//            'status' => $status,
//            'message' => $message,
//            'errors' => $errors,
//        ];
//    }
//
//    /**
//     * Standard success envelope structure
//     *
//     * @param int $status
//     * @param array $data
//     * @param string $message
//     * @return array
//     */
//    private function successEnvelope(
//        $status = 200,
//        $data = [],
//        $message = 'OK'
//    ) {
//        return [
//            'status' => $status,
//            'message' => $message,
//            'data' => $data,
//        ];
//    }

}
