<?php

namespace Krasilich\Algo\Sort;

/**
 * Class Merge
 *
 * Implements MergeSort algorithm
 *
 * @package Krasilich\Algo\Sort
 */
class Merge
{
    /**
     * @param array $a
     *
     * @return array
     */
    public function sort(array $a)
    {
        return $this->_sort($a, 0, count($a) - 1);
    }

    /**
     * @param array $a
     * @param int   $p
     * @param int   $r
     *
     * @return array
     */
    protected function _sort(array $a, $p, $r)
    {
        if ($p >= $r) {
            return $a;
        }

        $q = floor(($r + $p) / 2);
        $a = $this->_sort($a, $p, $q);
        $a = $this->_sort($a, $q + 1, $r);
        return $this->_merge($a, $p, $q, $r);
    }

    /**
     * @param array $a
     * @param int   $p
     * @param int   $q
     * @param int   $r
     *
     * @return array
     */
    protected function _merge(array $a, $p, $q, $r)
    {
        $left = $right = [];
        $i = $j = 0;

        for ($k = $p; $k <= $q; ++$k) {
            $left[] = $a[$k];
        }

        for ($k = $q + 1; $k <= $r; ++$k) {
            $right[] = $a[$k];
        }

        for ($k = $p; $k <= $r; ++$k) {
            if (count($left) && count($right)) {
                if ($left[$i] < $right[$j]) {
                    $a[$k] = $left[$i];
                    unset($left[$i]);
                    $i++;
                } else {
                    $a[$k] = $right[$j];
                    unset($right[$j]);
                    $j++;
                }
            } elseif (count($left)) {
                $a[$k] = $left[$i];
                unset($left[$i]);
                $i++;
            } elseif (count($right)) {
                $a[$k] = $right[$j];
                unset($right[$j]);
                $j++;
            } else {
                break;
            }
        }

        return $a;
    }
}
