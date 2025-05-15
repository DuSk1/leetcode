## [189\. Rotate Array](https://leetcode.com/problems/rotate-array/description/)

[Решение Python](https://leetcode.com/problems/rotate-array/submissions/1032012453/)

Given an integer array `nums`, rotate the array to the right by `k` steps, where `k` is non-negative.

**Example 1:**

**Input:** nums = [1,2,3,4,5,6,7], k = 3

**Output:** [5,6,7,1,2,3,4]

**Explanation:**

    rotate 1 steps to the right: [7,1,2,3,4,5,6]
    rotate 2 steps to the right: [6,7,1,2,3,4,5]
    rotate 3 steps to the right: [5,6,7,1,2,3,4] 

**Example 2:**

**Input:** nums = [-1,-100,3,99], k = 2

**Output:** [3,99,-1,-100]

**Explanation:**

    rotate 1 steps to the right: [99,-1,-100,3]
    rotate 2 steps to the right: [3,99,-1,-100] 

**Constraints:**

*   <code>1 <= nums.length <= 10<sup>5</sup></code>
*   <code>-2<sup>31</sup> <= nums[i] <= 2<sup>31</sup> - 1</code>
*   <code>0 <= k <= 10<sup>5</sup></code>

**Follow up:**

*   Try to come up with as many solutions as you can. There are at least **three** different ways to solve this problem.
*   Could you do it in-place with `O(1)` extra space?

___
Строка `17` в вашем коде:

```php
$t = $n - ($k % $n);
```

Выполняет следующие действия:

1. **Остаток от деления**: Вычисляет остаток от деления `k` на `n` (`$k % $n`). Это необходимо, чтобы учесть случаи,
когда `k` больше длины массива `n`. Остаток от деления позволяет корректно обработать такие случаи, так как вращение
массива на `n` или более шагов эквивалентно вращению на `k % n` шагов.

2. **Вычисление позиции**: Вычитает полученное значение из `n`, чтобы определить позицию, с которой нужно начать
вращение. Это значение (`$t`) указывает на индекс, с которого начинается новая "передняя" часть массива после вращения.

Таким образом, строка `17` помогает определить точку разделения массива для последующего вращения.
___
Time: O(n)

Mem: O(1)