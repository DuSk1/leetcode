<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class TreeNode
{
    public function __construct(
        public ?int  $val = null,
        public ?self $left = null,
        public ?self $right = null
    ) {}
}

class Solution
{

    private function test(): bool
    {
        $root = new TreeNode(5);
        $root->left = new TreeNode(4);
        $root->right = new TreeNode(8);
        $root->left->left = new TreeNode(11);
        $root->left->left->left = new TreeNode(7);
        $root->left->left->right = new TreeNode(2);
        $root->right->left = new TreeNode(13);
        $root->right->right = new TreeNode(4);
        $root->right->right->right = new TreeNode(1);

        $targetSum = 22;

        return $this->hasPathSum($root, $targetSum);
    }

    /**
     * @param TreeNode|null $root
     * @param Integer $targetSum
     * @return bool
     */
    public function hasPathSum(?TreeNode $root, int $targetSum): bool
    {
        return $this->hasSum($root, 0, $targetSum);
    }

    private function hasSum(?TreeNode $node, int $sum, int $targetSum): bool
    {
        if ($node == null) {
            return false;
        }

        $sum += $node->val;

        if ($node->left == null && $node->right == null) {
            return $sum == $targetSum;
        }

        return $this->hasSum($node->left, $sum, $targetSum) || $this->hasSum($node->right, $sum, $targetSum);
    }

}
