## [102. Binary Tree Level Order Traversal](https://leetcode.com/problems/binary-tree-level-order-traversal/description/)

Учитывая корень двоичного дерева, верните его уровневый обход узлов (сверху вниз, слева направо).

Given the `root` of a binary tree, return _the level order traversal of its nodes' values_. (i.e., from left to right, level by level).

**Example 1:**

![](https://assets.leetcode.com/uploads/2021/02/19/tree1.jpg)

**Input:** root = [3,9,20,null,null,15,7]

**Output:** [[3],[9,20],[15,7]]

**Example 2:**

Входные данные: root = [1]

```
    1
```

**Example 3:**

Ввод: root = []

```
[]
```


**Example 4:**

Ввод: root = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]

```
        1
       / \
      2   3
     / \ / \
    4  5 6  7
   / \ / \ / \
  8  9 10 11 12
 / \
13 14
```

Вывод: [[1], [2, 3], [4, 5, 6, 7], [8, 9, 10, 11, 12], [13, 14]]


**Constraints:**

*   The number of nodes in the tree is in the range `[0, 2000]`.
*   `-1000 <= Node.val <= 1000`

### Complexity
Time complexity: O(n)

Memory complexity: O(n)

### Пояснения
Более точная оценка по памяти - O(n + h) = O(2n), h в худшем случае равно n (в худшем случае дерево может быть бамбуком, и тогда глубина дерева будет равна количеству узлов).
