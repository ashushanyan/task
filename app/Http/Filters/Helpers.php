<?php

namespace App\Http\Filters;


use Carbon\Carbon;

trait Helpers
{
    protected function dateFilter($query, string $requestKey, array $options): void
    {
        if (!key_exists('operator', $options)){
            throw new \Exception("Operator is required on '$requestKey'");
        } elseif (!key_exists('column', $options)){
            throw new \Exception("Column is required on '$requestKey'");
        }

        try {
            $date = Carbon::parse($this->request->$requestKey);
        } catch (\Exception $e) {
            throw new \Exception('Invalid parameter for date filter');
        }

        if ($options['endOfDay'] ?? false) $date->endOfDay();

        $query->where(
            $options['column'],
            $options['operator'],
            ($options['convertTimezone'] ?? true) ? convertUserTimezoneToUTC($date) : $date
        );
    }

    protected function dateParams(string $column, bool $convertTimezone, string $operator = '>=', bool $endOfDay = false) : array
    {
        return [
            'action'            => 'date',
            'operator'          => $operator,
            'column'            => $column,
            'endOfDay'          => $endOfDay,
            'convertTimezone'   => $convertTimezone,
        ];
    }

    protected function from(string $column = 'created_at', bool $setTimezone = true) : array
    {
        return $this->dateParams($column, $setTimezone);
    }

    protected function to(string $column = 'created_at', bool $setTimezone = true) : array
    {
        return $this->dateParams($column, $setTimezone, '<=', true);
    }

    protected function relationFilter(string $relation, $column, $queryMethod = 'whereIn') : array // column doesn't have type because it can be array or string
    {

        $relationHierarchy = explode('.', $relation);

        $output = [
            'action'        => 'relation',
            'relationName'  => array_shift($relationHierarchy),
            'rule'          => $this->getRule($relationHierarchy, $column, $queryMethod)
        ];

        return $output;
    }

    protected function getRule(array & $remainingRelations, $column, $queryMethod = 'whereIn') : array
    {

        if (empty($remainingRelations))
            return $this->getRelationParams($column, $queryMethod);

        return $this->relationFilter(implode('.', $remainingRelations), $column, $queryMethod);
    }

    private function getRelationParams($column, string $queryMethod = 'whereIn') : array
    {
        return is_array($column) ? $column : [
            'params' => [
                'column'        => $column,
                'queryMethod'   => $queryMethod
            ]
        ];
    }

    protected function params(string $column, string $queryMethod = 'whereIn'): array
    {
        return [
            'params'    => [
                'column'        => $column,
                'queryMethod'   => $queryMethod
            ]
        ];
    }

    protected function action(string $action, array $params = []): array
    {
        return [
            'action' => $action,
            'params' => $params
        ];
    }

    public function setOrdering(bool $withOrders): self
    {
        $this->withOrders = $withOrders;

        return $this;
    }

    private function applySearch($query, string $requestKey, array $options)
    {
//        dd($requestKey);
        $query->where(function ($query) use ($requestKey, $options) {
            foreach ((array) $this->request->get($requestKey) as $search) {
                foreach ($options['searchIn'] as $searchableColumn) {
                    $query->Where($searchableColumn, 'like', '%' . $search . '%');
                }
            }
        });
    }

    protected function searchParams($searchIn): array
    {
        return [
            'action'    => 'search',
            'searchIn'  => is_array($searchIn) ? $searchIn : func_get_args()
        ];
    }

}