## [101. Symmetric Tree](https://leetcode.com/problems/symmetric-tree/description/)

[Решение Python](https://leetcode.com/problems/symmetric-tree/submissions/969526824/)

Учитывая `root` двоичного дерева, проверьте, является ли оно зеркальным отражением самого себя (то есть симметричным относительно своего центра).

Given the root of a binary tree, check whether it is a mirror of itself (i.e., symmetric around its center).


**Example 1:**

**Input:** root = [1,2,2,3,4,4,3]

**Output:** true

![](https://assets.leetcode.com/uploads/2021/02/19/symtree1.jpg)

**Example 2:**

![](https://assets.leetcode.com/uploads/2021/02/19/symtree2.jpg)

**Input:** root = [1,2,2,null,3,null,3]

**Output:** false

**Constraints:**

*   The number of nodes in the tree is in the range `[1, 1000]`.
*   `-100 <= Node.val <= 100`

### Complexity
Time complexity: O(n).

Memory complexity:  O(n). Зависит от высоты дерева, то есть O(h), где h - высота дерева. В худшем случае h = n, где n - количество узлов в дереве. 
