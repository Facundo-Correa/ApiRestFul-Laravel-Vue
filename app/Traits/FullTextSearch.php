<?php

namespace App\Traits;

trait FullTextSearch
{
    /**
     * Replaces spaces with full text search wildcards
     *
     * @param string $term
     * @return string
     */
    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $preposiciones =['a','ante','bajo','cabe','con','contra','de','desde','en','entre','hasta','hacia','para','por','según','sin','so','sobre','tras'];

        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if(strlen($word) >= 2) {
                if(!in_array($word,$preposiciones)) {
                    $words[$key] = '+' . $word . '*';
                }
            }
        }

        $searchTerm = implode( '', $words);

        return $searchTerm;
    }

    /**
     * Scope a query that matches a full text search of term.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        $columns = implode(',',$this->searchable);

        $searchableTerm = $this->fullTextWildcards($term);

        return $query->selectRaw("*, MATCH ({$columns}) AGAINST ('{$searchableTerm}' IN BOOLEAN MODE) AS relevance_score", [])
            ->whereRaw("MATCH ({$columns}) AGAINST ('{$searchableTerm}' IN BOOLEAN MODE) > 0")
            ->orderByDesc('relevance_score');
    }
}
