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
    /**
     * @param TreeNode $root
     * @return bool
     */
    public function isSymmetric(TreeNode $root): bool
    {
        return $this->isMirror($root, $root);
    }

    private function isMirror($t1, $t2): bool
    {
        if ($t1 == null && $t2 == null) {
            return true;
        }

        if ($t1 == null || $t2 == null) {
            return false;
        }

        return
            $t1->val == $t2->val
            && $this->isMirror($t1->right, $t2->left)
            && $this->isMirror($t1->left, $t2->right);
    }
}

exit(0);
