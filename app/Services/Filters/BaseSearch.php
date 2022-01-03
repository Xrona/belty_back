<?php

declare(strict_types=1);


namespace App\Services\Filters;


use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ReflectionObject;

/**
 * Trait BaseSearch
 * @package App\Services\Filters
 */
trait BaseSearch
{
    /**
     * @param Request $request
     * @return Builder
     */
    public function apply(Request $request): Builder
    {
        /** @var Eloquent $eloquent */
        $eloquent = $this->getObject();

        return $this->applyObjectFromRequest($request, $eloquent->newQuery());
    }

    /**
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private function applyObjectFromRequest(Request $request, Builder $query): Builder
    {
        foreach ($request->all() as $filterName => $value) {
            if ($value === '') {
                continue;
            }

            $object = $this->createFilterObject($filterName);

            if (class_exists($object) && new $object instanceof Filterable) {
                $query = $object::apply($query, $value);
            }
        }

        return $query;
    }

    /**
     * @param $name
     * @return string
     */
    private function createFilterObject($name): string
    {
        return $this->getNameSpace() . '\\' . Str::studly($name);
    }

    /**
     * @return string
     */
    protected function getNameSpace(): string
    {
        return (new ReflectionObject($this))->getNamespaceName();
    }

    /**
     * @return mixed
     */
    protected function getObject(): mixed
    {
        $className = $this->getModelClass();

        return new $className;
    }

    /**
     * @return string
     */
    abstract protected function getModelClass(): string;
}
