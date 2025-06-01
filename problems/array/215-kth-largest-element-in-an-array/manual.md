## [215\. Kth Largest Element in an Array](https://leetcode.com/problems/kth-largest-element-in-an-array/description/)

Given an integer array `nums` and an integer `k`, return _the_ <code>k<sup>th</sup></code> _largest element in the array_.

Note that it is the <code>k<sup>th</sup></code> largest element in the sorted order, not the <code>k<sup>th</sup></code> distinct element.

**Example 1:**

**Input:** nums = [3,2,1,5,6,4], k = 2

**Output:** 5

**Example 2:**

**Input:** nums = [3,2,3,1,2,4,5,5,6], k = 4

**Output:** 4

**Constraints:**

*   <code>1 <= k <= nums.length <= 10<sup>4</sup></code>
*   <code>-10<sup>4</sup> <= nums[i] <= 10<sup>4</sup></code>

**Решение:**

Создаем minheap и заполняем первыми k элементами.

Перебираем оставшиеся элементы (начинаем с k и до count(nums)).

В цикле сравниваем корень с текущим элементом.

Если элемент больше, то удаляем корень и добавляем в кучу этот элемент.

Вернуть корень кучи.


**time: O(n)**

**mem: O(n)**