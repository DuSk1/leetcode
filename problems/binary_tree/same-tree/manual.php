<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */
/** @noinspection PhpUnused */

class TreeNode
{
    public function __construct(
        public ?int  $val = null,
        public ?self $left = null,
        public ?self $right = null
    )
    {
    }
}

class Solution
{
    /**
     * @param TreeNode|null $p
     * @param TreeNode|null $q
     * @return Boolean
     */
    public function isSameTree(?TreeNode $p, ?TreeNode $q): bool
    {
        if ($p == null && $q == null) {
            return true;
        }

        if ($p == null || $q == null) {
            return false;
        }

        return ($p->val == $q->val) && $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}
