<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */
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

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    public function levelOrder(TreeNode $root): array
    {
        $lists = [];

        $this->rightSideView($root, 0, $lists);

        return $lists;
    }

    private function rightSideView($root, $depth, &$lists): void
    {
        if ($root == null) {
            return;
        }

        if (count($lists) <= $depth) {
            $lists[] = 0;
        }

        $lists[$depth] = $root->val;

        $this->rightSideView($root->left, $depth + 1, $lists);
        $this->rightSideView($root->right, $depth + 1, $lists);
    }
}


exit(0);
