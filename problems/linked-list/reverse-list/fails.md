```php
class Solution206
{
    public function reverseList(ListNode $head): ?ListNode
    {
        $prev = null;
        $curr = $head;

        while ($curr) {
            $tmp = $curr;
            $curr = $curr->next;
            $tmp->next = $prev; // key move
            $prev = **$tmp->next**; // Тут никакой не next
        }

        return $prev;
    }

}

```