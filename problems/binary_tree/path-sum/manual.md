## [112. Path Sum](https://leetcode.com/problems/path-sum/description/)

[Решение Python](https://leetcode.com/problems/path-sum/submissions/989133327/)

Given the `root` of a binary tree and an integer `targetSum`, return `true` if the tree has a **root-to-leaf** path such that adding up all the values along the path equals `targetSum`.

A **leaf** is a node with no children.

**Example 1:**

![](https://assets.leetcode.com/uploads/2021/01/18/pathsum1.jpg)

**Input:** root = [5,4,8,11,null,13,4,7,2,null,null,null,1], targetSum = 22

**Output:** true

**Example 2:**

![](https://assets.leetcode.com/uploads/2021/01/18/pathsum2.jpg)

**Input:** root = [1,2,3], targetSum = 5

**Output:** false

**Example 3:**

**Input:** root = [1,2], targetSum = 0

**Output:** false

**Constraints:**

*   The number of nodes in the tree is in the range `[0, 5000]`.
*   `-1000 <= Node.val <= 1000`
*   `-1000 <= targetSum <= 1000`

### Complexity
Time complexity: O(n).

Memory complexity: O(n). Зависит от высоты дерева, то есть O(h), где h - высота дерева. В худшем случае h = n, где n - количество узлов в дереве. Храним стек вызовов функции, который в худшем случае будет содержать n элементов. 
