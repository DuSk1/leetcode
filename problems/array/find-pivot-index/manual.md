## [724. Find Pivot Index](https://leetcode.com/problems/find-pivot-index/description/)

[Решение Python](https://leetcode.com/problems/find-pivot-index/submissions/1038759937/)

Given an array of integers `nums`, calculate the pivot index of this array.

The pivot index is the index where the sum of all the numbers strictly to the left of the index is equal to the sum of all the numbers strictly to the index's right.

If the index is on the left edge of the array, then the left sum is `0` because there are no elements to the left. This also applies to the right edge of the array.

Return the leftmost pivot index. If no such index exists, return `-1`.
____
Дан массив целых чисел nums. Вычислите опорный индекс этого массива.

Опорный индекс — это индекс, при котором сумма всех чисел, строго расположенных слева от индекса, равна сумме всех чисел, строго расположенных справа от индекса.

Если индекс находится на левом краю массива, то левая сумма равна 0, потому что слева нет элементов. Это также относится к правому краю массива.

Верните крайний левый индекс поворота. Если такого индекса не существует, верните -1.

**Example 1:**

**Input:** nums = [1,7,3,6,5,6]

**Output:** 3

**Explanation:**
The pivot index is 3.
Left sum = nums[0] + nums[1] + nums[2] = 1 + 7 + 3 = 11
Right sum = nums[4] + nums[5] = 5 + 6 = 11

**Example 2:**

**Input:** nums = [1,2,3]

**Output:** -1

**Explanation:**
There is no index that satisfies the conditions in the problem statement.

**Example 3:**

**Input:** nums = [2,1,-1]

**Output:** 0

**Explanation:**
The pivot index is 0.
Left sum = 0 (no elements to the left of index 0)
Right sum = nums[1] + nums[2] = 1 + -1 = 0

**Example 4:**

**Input:** nums = [0,0,0,0,1]

**Output:** 4

**Explanation:**
The pivot index is 4.
Left sum = nums[0] + nums[1] + nums[2] + nums[3] = 0 + 0 + 0 + 0 = 0
Right sum = 1


**Constraints:**
* 1 <= nums.length <= 104
* -1000 <= nums[i] <= 1000

### Complexity
Time: O(n)

Mem: O(1)


