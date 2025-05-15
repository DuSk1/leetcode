## Meeting rooms

Given an 2D integer array A of size N x 2 denoting time intervals of different meetings.

Where:

A[i][0] = start time of the ith meeting.
A[i][1] = end time of the ith meeting.

Find the minimum number of conference rooms required so that all meetings can be done.

Note :- If a meeting ends at time t, another meeting starting at time t can use the same conference room

**Example 1:**

A = [
    [0, 30]
    [5, 10]
    [15, 20]
]

Output: 2

**Example 2:**

A = [ 
    [1, 18]
    [18, 23]
    [15, 29]
    [4, 15]
    [2, 11]
    [5, 13]
]

Output: 4

Constraints:

* 1 <= N <= 105

* 0 <= A[i][0] < A[i][1] <= <code>2<sup>109</sup></code>

### Complexity
time: O(N*logN)
mem: O(n)

### Пояснения
Метод точек.