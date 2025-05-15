## [303. Range Sum Query - Immutable](https://leetcode.com/problems/range-sum-query-immutable/description/)

[Решение Python](https://leetcode.com/problems/range-sum-query-immutable/submissions/1031987099/)

Given an integer array `nums`, handle multiple queries of the following type:

Calculate the sum of the elements of `nums` between indices `left` and `right` inclusive where `left <= right`.
Implement the `NumArray` class:

* `NumArray(int[] nums)` Initializes the object with the integer array `nums`.
* `int sumRange(int left, int right)` Returns the sum of the elements of `nums` between indices `left` and `right` inclusive (i.e. nums[left] + nums[left + 1] + ... + nums[right]).

**Example 1:**

**Input:**
["NumArray", "sumRange", "sumRange", "sumRange"]
[[[-2, 0, 3, -5, 2, -1]], [0, 2], [2, 5], [0, 5]]

**Output:**
[null, 1, -1, -3]

**Explanation:**
* NumArray numArray = new NumArray([-2, 0, 3, -5, 2, -1]);
* numArray.sumRange(0, 2); // return 1 ((-2) + 0 + 3)
* numArray.sumRange(2, 5); // return -1 (3 + (-5) + 2 + (-1))
* numArray.sumRange(0, 5); // return -3 ((-2) + 0 + 3 + (-5) + 2 + (-1))

**Constraints:**
* 1 <= nums.length <= 104
* -105 <= nums[i] <= 105
* 0 <= left <= right < nums.length
* At most 104 calls will be made to sumRange.

### Complexity
Time complexity: O(1) для каждого запроса, O(n) для предварительных вычислений

Memory complexity: O(n)

### Интуиция
Поскольку нам нужно получить сумму подмассива, мы можем использовать здесь префиксный подход:
«В массиве целых чисел префиксный массив сумм — это массив, каждый элемент которого является суммой всех элементов исходного массива до текущего индекса».
Например, для массива [1, 1, 4, 2] префиксный массив сумм будет [1, 2, 6, 8]

### Подход
Мы можем подготовить массив префиксных сумм в конструкторе и сохранить его в свойстве. Затем мы можем использовать этот сохранённый массив префиксов для запросов, чтобы получить сумму подмассива по формуле:
правый индекс — (левый индекс — 1).


