def fibonacci(n):
    a, b = 0, 1
    series = []
    for _ in range(n):
        series.append(a)
        a, b = b, a + b
    return series

# Input from user
N = int(input("Enter number of terms: "))
print("Fibonacci series:", fibonacci(N))
