
## Fails

1. **Fail description**: Не добавляется первый интервал в результат.


```php
class Solution
{
// time: O(N*logN)
// mem: O(n)
public function merge(array $intervals): array
{

        /**
         * time: O(n*log(n))
         * 
        */
        sort($intervals); // в худшем случае O(n^2)
        
        $result = [];
        
        $result = $intervals[0]; // FAIL - правильно $result[] = $intervals[0]; 
        
        /**
         * $i:
         *  1
         *  2
         *  3
         */
        for ($i = 1; $i < count($intervals); $i++) {
            
            $interval = $intervals[$i];
            
            if ($this->isOverlapping(end($result), $interval)) {
                
                $result[count($result) - 1] = $this->mergeTwoIntervals(end($result), $interval);
                
            } else {
                
                $result[] = $interval;
                
            }
            
        }
        
        return $result;
    }
    
    private function isOverlapping(array $a, array $b): bool
    {
        return max($a[0], $b[0]) <= min($a[1], $b[1]);
    }
    
    private function mergeTwoIntervals(array $a, array $b): array
    {
        // по условию start <= end
        // $a[0] <= $b[0]
        return [$a[0], max($a[1], $b[1])];
    }

}
```