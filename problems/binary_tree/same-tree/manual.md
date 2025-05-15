## [100. Same Tree](https://leetcode.com/problems/same-tree/description/)

[Решение Python](https://leetcode.com/problems/same-tree/submissions/1025715566/)

Given the roots of two binary trees `p` and `q`, write a function to check if they are the same or not.

Two binary trees are considered the same if they are structurally identical, and the nodes have the same value.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/12/20/ex1.jpg)

**Input:** p = [1,2,3], q = [1,2,3]

**Output:** true 

**Example 2:**

![](https://assets.leetcode.com/uploads/2020/12/20/ex2.jpg)

**Input:** p = [1,2], q = [1,null,2]

**Output:** false 

**Example 3:**

![](https://assets.leetcode.com/uploads/2020/12/20/ex3.jpg)

**Input:** p = [1,2,1], q = [1,1,2]

**Output:** false 

**Constraints:**

*   The number of nodes in both trees is in the range `[0, 100]`.
*   <code>-10<sup>4</sup> <= Node.val <= 10<sup>4</sup></code>

### Complexity
Time complexity: O(n).

Memory complexity: O(n). Зависит от высоты дерева, то есть O(h), где h - высота дерева. В худшем случае h = n, где n - количество узлов в дереве. Храним стек вызовов функции, который в худшем случае будет содержать n элементов. 
