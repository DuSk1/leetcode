## 347. Top K Frequent Elements (Medium) 

https://leetcode.com/problems/top-k-frequent-elements/description/
347\. Top K Frequent Elements

Medium

Given a non-empty array of integers, return the k most frequent elements.

Example 1:

Input: nums = [1,1,1,2,2,3], k = 2

Output: [1,2]

Example 2:

Input: nums = [1], k = 1

Output: [1]

Note:

- You may assume k is always valid, 1 ≤ k ≤ number of unique elements.

- Your algorithm's time complexity must be better than O(n log n), where n is the array's size.
- It's guaranteed that the answer is unique, in other words the set of the top k frequent elements is unique.
- You can return the answer in any order.

**Решение**

Составить хэш таблицу: элемент => частота

Сделать массив frequencyList, где ключ частота, а значение - массив элементов, которые встречаются с этой частотой.

Идем по frequencyList с конца, в каждой частоте обходим массивы и добавляем в ответ пока k != 0.