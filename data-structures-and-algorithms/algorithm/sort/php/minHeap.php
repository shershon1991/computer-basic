<?php

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    public function __construct($value)
    {
        $this->val = $value;
    }
}

/**
 * Brief: 最小堆的特性是父节点的值比子节点的值小或等。根节点的值最小
 * Class: MinHeap
 * Author: work(tanxiaoshan@doushen.com)
 * DateTime: 2021/7/16 10:11 上午
 */
class MinHeap
{
    public $size = 0;
    public $data = [];    //原始索引对应的数据，使用数组实现堆。
    public $index_arr = [];    //索引对应的原始数据的索引，好处是交换索引就行了，不用交换数据。

    //向最小堆添加数据元素
    public function add($val)
    {
        $this->size++;
        $this->data[] = $val;
        $k = $this->size - 1;
        $this->index_arr[] = $k;
        $this->siftUp($k);
    }

    /**
     * @param $index
     * @throws Exception
     * $index 是 $this->index_arr 的索引。
     * 向已有根节点的堆，添加数据
     */
    public function siftUp($index)
    {
        while ($index > 0 && $this->data[$this->index_arr[$index]] < $this->data[$this->index_arr[$this->_parent($index)]]) {
            $this->swap($index, $this->_parent($index));
            $index = $this->_parent($index);
            //print_r($this->data);
        }
    }

    //索引堆，交换索引，维持最小堆的性质。
    public function swap($i, $j)
    {
        if ($i < 0 || $i >= $this->size || $j < 0 || $j >= $this->size) {
            throw new \Exception('数组越界');
        }

        $tmp = $this->index_arr[$i];
        $this->index_arr[$i] = $this->index_arr[$j];
        $this->index_arr[$j] = $tmp;
    }

    //获取最小元素，然后把一个元素$val放到根节点，进行siftDown操作，维持最小堆的性质。
    public function replace($val)
    {
        $min = $this->getMin();
        $this->data[$this->index_arr[0]] = $val;
        $this->siftDown(0);

        return $min;
    }

    //获取最小元素，即根节点的元素。
    public function getMin()
    {
        if ($this->size == 0) {
            throw new \Exception('没有元素');
        }

        return $this->data[$this->index_arr[0]];
    }

    //取最小元素，然后进行siftDown，维持最小堆的性质
    public function extractMin()
    {
        $min = $this->getMin();
        $tmp = $this->index_arr[0];
        $this->index_arr[0] = $this->index_arr[$this->size - 1];
        unset($this->data[$tmp]);
        array_pop($this->index_arr);
        $this->size--;
        $this->siftDown(0);
        return $min;
    }

    //根节点的元素，和子节点的元素比较，如果大于子节点，就要和子节点交换，即下沉siftDown操作，维持最小堆的性质。
    public function siftDown($index)
    {
        //$i=0;

        while ($this->leftChild($index) < $this->size) {
            //$i++;

            $c = $this->leftChild($index);
            if ($c + 1 < $this->size && $this->data[$this->index_arr[$c]] > $this->data[$this->index_arr[$c + 1]]) {
                $c = $this->rightChild($index);
            }

            if ($this->data[$this->index_arr[$index]] > $this->data[$this->index_arr[$c]]) {
                $this->swap($index, $c);
                $index = $c;
            } else {
                break;
            }
        }
    }

    /**
     * heapify
     * 把一组数据，构造为最小堆。
     */
    public function heapify($data)
    {
        if (!empty($this->data)) {
            throw new \Exception('Heap不为空，不能进行heapify操作');
        }
        $this->data = $data;
        $this->index_arr = array_keys($this->data);
        $this->size = count($this->index_arr);
        $last_not_leaf = $this->_parent($this->size - 1);
        while ($last_not_leaf >= 0) {
            $this->siftDown($last_not_leaf);
            $last_not_leaf--;
        }
    }

    public function destory()
    {
        $this->data = [];
        $this->size = 0;
        $this->index_arr = [];
    }

    public function getAll()
    {
        $arr = [];
        foreach ($this->index_arr as $val) {
            $arr[] = $this->data[$val];
        }

        return $arr;
    }

    //堆的索引从0开始，获取某个节点的父节点。
    public function _parent($index)
    {
        if ($index == 0) {
            throw new \Exception('没有父元素');
        }

        return intdiv($index - 1, 2);
    }

    //堆的索引从0开始，获取某个节点的左子节点。
    public function leftChild($index)
    {
        return 2 * $index + 1;
    }

    //堆的索引从0开始，获取某个节点的右子节点。
    public function rightChild($index)
    {
        return 2 * $index + 2;
    }
}

//堆排序是不稳定的，只能保证前面元素的频率大于等于后面的。
class Solution
{

    function topKFrequent($nums, $k)
    {
        if (empty($nums) || $k <= 0) {
            return [];
        }
        $res = [];
        $res2 = [];
        $times_arr = array_count_values($nums); //$times_arr是key-value数组，其中key保存了元素值，value保存了出现的频率。
        $min_heep = new MinHeap();

        foreach ($times_arr as $val) {
            if ($min_heep->size < $k) {
                //在最小堆没有满的情况下，向堆添加元素。
                $min_heep->add($val);
            } else if ($min_heep->getMin() < $val) {
                //如果堆满了，并且堆的最小值小于频率$val，则replace操作。
                $min_heep->replace($val);
            }
        }

        //完成了最小堆的构建，使得出现频率最大的k个元素都在堆里。
        //取出根节点，即前k个频率最大的中，频率最小的。
        $low_k = $min_heep->getMin();

        //合并频率相同元素的到数组res
        foreach ($times_arr as $k => $val) {
            if ($val >= $low_k) {
                if (isset($res[$val])) {
                    array_push($res[$val], $k);
                } else {
                    $res[$val] = [$k];
                }
            }
        }

        //按key【即出现的频率】降序排序，求出出现频率从高到低
        krsort($res, SORT_NUMERIC);

        foreach ($res as $val) {
            foreach ($val as $val2) {
                $res2[] = $val2;
            }
        }

        return $res2;
    }
}

//$nums = [0, 1, 2, 5, 7, 8, 9, 10, 11, 12, 13, 13, 12, 11, 10];
$nums = [5, 3, 1, 1, 1, 3, 73, 1, 6, 6, 6, 6, 5, 5, 5];
$k = 4;
$obj = new Solution();
$res = $obj->topKFrequent($nums, $k);
echo implode(" ", $res) . PHP_EOL;
// "5 1 6 3"
