// ITERATIVE (1-based vertices)
#include <stdio.h>

#define MAX 11   // allow indices 1..10

int adj[MAX][MAX];
int visited[MAX];
int n;

void DFS_iterative(int start) {
    int stack[MAX];
    int top = -1;

    stack[++top] = start;

    while (top != -1) {
        int v = stack[top--];

        if (!visited[v]) {
            printf("%d ", v);
            visited[v] = 1;

            // Push adjacent unvisited vertices (descending so lower gets visited first)
            for (int i = n; i >= 1; i--) {
                if (adj[v][i] == 1 && visited[i] == 0)
                    stack[++top] = i;
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

    for (int i = 1; i <= n; i++)
        for (int j = 1; j <= n; j++)
            adj[i][j] = 0;

    printf("Enter edges (u v):\n");
    for (int i = 0; i < edges; i++) {
        scanf("%d%d", &v1, &v2);
        adj[v1][v2] = adj[v2][v1] = 1;
    }

    printf("Enter starting vertex: ");
    scanf("%d", &start);

    for (int i = 1; i <= n; i++)
        visited[i] = 0;

    printf("DFS Traversal (Iterative): ");
    DFS_iterative(start);
    printf("\n");

    return 0;
}
