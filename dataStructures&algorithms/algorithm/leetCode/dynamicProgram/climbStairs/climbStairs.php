<?php

// Leetcode-70
class climbStairs
{
    private $memo = [];

    public function calcWays($n)
    {
        if ($n == 1)
            return 1;
        if ($n == 2)
            return 2;

        if ($this->memo[$n] == -1)
            $this->memo[$n] = $this->calcWays($n - 1) + $this->calcWays($n - 2);

        return $this->memo[$n];
    }

    // 记忆化搜索
    public function climbStairs($n)
    {
        $staticVal = -1;
        $keys = range(0, $n);
        $this->memo = array_fill_keys($keys, $staticVal);

        return $this->calcWays($n);
    }

    // 动态规划
    public function climbStairs2($n)
    {
        $staticVal = -1;
        $keys = range(1, $n);
        $this->memo = array_fill_keys($keys, $staticVal);

        $this->memo[1] = 1;
        $this->memo[2] = 2;

        for ($i = 3; $i <= $n; $i++) {
            $this->memo[$i] = $this->memo[$i - 1] + $this->memo[$i - 2];
        }

        return $this->memo[$n];
    }
}

//var_dump((new Solution())->climbStairs(6));
//var_dump((new Solution())->climbStairs2(4));