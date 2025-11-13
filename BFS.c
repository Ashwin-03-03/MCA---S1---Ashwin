#include <stdio.h>

#define MAX 10

int adj[MAX][MAX];
int visited[MAX];
int queue[MAX];
int front = -1, rear = -1;
int n;

void enqueue(int v) {
    if (rear == MAX - 1)
        return;
    if (front == -1)
        front = 0;
    queue[++rear] = v;
}

int dequeue() {
    if (front == -1 || front > rear)
        return -1;
    return queue[front++];
}

void BFS(int start) {
    visited[start] = 1;
    enqueue(start);

    while (front <= rear) {
        int v = dequeue();
        printf("%d ", v + 1);  // convert back to 1-based when printing

        for (int i = 0; i < n; i++) {
            if (adj[v][i] == 1 && visited[i] == 0) {
                enqueue(i);
                visited[i] = 1;
            }
        }
    }
}

int main() {
    int edges, v1, v2, start;

    printf("Enter number of vertices: ");
    scanf("%d", &n);

    printf("Enter number of edges: ");
    scanf("%d", &edges);

    for (int i = 0; i < n; i++)
        for (int j = 0; j < n; j++)
            adj[i][j] = 0;

    printf("Enter the edges (u v):\n");
    for (int i = 0; i < edges; i++) {
        scanf("%d%d", &v1, &v2);
        v1--; v2--;  // convert to 0-based
        adj[v1][v2] = adj[v2][v1] = 1;
    }

    printf("Enter the starting vertex: ");
    scanf("%d", &start);
    start--; // convert to 0-based

    for (int i = 0; i < n; i++)
        visited[i] = 0;

    printf("BFS Traversal: ");
    BFS(start);
    printf("\n");

    return 0;
}
