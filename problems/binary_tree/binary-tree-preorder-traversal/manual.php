<?php
/** @noinspection PhpUnused */

class TreeNode
{
    public ?int $val = null;
    public ?self $left = null;
    public ?self $right = null;

    public function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution144
{
    /**
     * @param TreeNode|null $root
     * @return Integer[]
     */
    public function preorderTraversal(?TreeNode $root): array
    {
        $res = [];
        $this->traverse($root, $res);
        return $res;
    }

    private function traverse(?TreeNode $root, &$res): void
    {
        if (!$root) {
            return;
        }

        $res[] = $root->val;

        $this->traverse($root->left, $res);
        $this->traverse($root->right, $res);
    }
}

exit(0);
