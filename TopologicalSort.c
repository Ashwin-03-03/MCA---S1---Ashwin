#include <stdio.h>
#include <stdlib.h>

#define MAX 10

int adj[MAX][MAX];    // adjacency matrix
int indegree[MAX];    // indegree of each vertex
int n;                // number of vertices

void topologicalSort() {
    int queue[MAX], front = 0, rear = -1;
    int count = 0;  // number of vertices processed

    // enqueue all vertices with indegree 0
    for (int i = 0; i < n; i++) {
        if (indegree[i] == 0) {
            queue[++rear] = i;
        }
    }

    printf("Topological order: ");
    while (front <= rear) {
        int v = queue[front++];
        printf("%d ", v);
        count++;

        // reduce indegree of neighbors
        for (int i = 0; i < n; i++) {
            if (adj[v][i] == 1) {
                indegree[i]--;
                if (indegree[i] == 0) {
                    queue[++rear] = i;
                }
            }
        }
    }

    if (count != n) {
        printf("\nGraph has a cycle, topological sort not possible.\n");
    }
    printf("\n");
}

int main() {
    int edges, u, v;
    printf("Enter number of vertices: ");
    scanf("%d", &n);

    // initialize
    for (int i = 0; i < n; i++) {
        indegree[i] = 0;
        for (int j = 0; j < n; j++)
            adj[i][j] = 0;
    }

    printf("Enter number of edges: ");
    scanf("%d", &edges);

    printf("Enter edges (u v) meaning u -> v:\n");
    for (int i = 0; i < edges; i++) {
        scanf("%d %d", &u, &v);
        adj[u][v] = 1;
        indegree[v]++;
    }

    topologicalSort();

    return 0;
}
