## [268. Missing Number](https://leetcode.com/problems/missing-number/description/)

[Решение Python](https://leetcode.com/problems/missing-number/submissions/1032004528/)

Given an array nums containing n distinct numbers in the range [0, n], return the only number in the range that is 
missing from the array.

Follow up: Could you implement a solution using only O(1) extra space complexity and O(n) runtime complexity?

Example 1:
```
Input: nums = [3,0,1]
Output: 2
Explanation: n = 3 since there are 3 numbers, so all numbers are in the range [0,3]. 2 is the missing number in the range since it does not appear in nums.
```

Example 2:
```
Input: nums = [0,1]
Output: 2
Explanation: n = 2 since there are 2 numbers, so all numbers are in the range [0,2]. 2 is the missing number in the range since it does not appear in nums.
```

Example 3:
```
Input: nums = [9,6,4,2,3,5,7,0,1]
Output: 8
Explanation: n = 9 since there are 9 numbers, so all numbers are in the range [0,9]. 8 is the missing number in the range since it does not appear in nums.
```

Example 4:
```
Input: nums = [0]
Output: 1
Explanation: n = 1 since there is 1 number, so all numbers are in the range [0,1]. 1 is the missing number in the range since it does not appear in nums.
```
    
Constraints:
* n == nums.length
* 1 <= n <= 10^4
* 0 <= nums[i] <= n
* All the numbers of nums are unique.


### Решение

We know that we have n numbers in the nums input array. What if we compare the sum of the numbers in the input array with sum of numbers of a "perfect" array, where no elements are missing?
In other words, if we have n elements in nums, we can do this:
1. Count all numbers from 1 to n - 0+1+2+3+ ... + n
2. Count all of the numbers in the input array - 0+1+3+4 ... + n (2 is missing)
3. Compare the results - the difference between them will be the missing number.

How do we get the sum of numbers from 0 to n? We can use a math formula to get the sum of first n natural numbers: sum = n ( n + 1 ) / 2

PHP Solution: O(n) runtime, O(1) extra space