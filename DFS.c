//ITERATIVE IMPLEMENTATION
#include <stdio.h>

#define MAX 10

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

            // Push all adjacent unvisited vertices
            for (int i = n - 1; i >= 0; i--) {
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

    for (int i = 0; i < n; i++)
        for (int j = 0; j < n; j++)
            adj[i][j] = 0;

    printf("Enter edges (u v):\n");
    for (int i = 0; i < edges; i++) {
        scanf("%d%d", &v1, &v2);
        adj[v1][v2] = adj[v2][v1] = 1;
    }

    printf("Enter starting vertex: ");
    scanf("%d", &start);

    for (int i = 0; i < n; i++)
        visited[i] = 0;

    printf("DFS Traversal (Iterative): ");
    DFS_iterative(start);

    return 0;
}


//RECURSIVE IMPLEMENTATION
// #include <stdio.h>

// #define MAX 10

// int adj[MAX][MAX];
// int visited[MAX];
// int n; // Number of vertices

// void DFS(int v) {
//     visited[v] = 1;
//     printf("%d ", v);

//     for (int i = 0; i < n; i++) {
//         if (adj[v][i] == 1 && visited[i] == 0) {
//             DFS(i);
//         }
//     }
// }

// int main() {
//     int edges, v1, v2, start;

//     printf("Enter number of vertices: ");
//     scanf("%d", &n);

//     printf("Enter number of edges: ");
//     scanf("%d", &edges);

//     // Initialize adjacency matrix with 0
//     for (int i = 0; i < n; i++)
//         for (int j = 0; j < n; j++)
//             adj[i][j] = 0;

//     printf("Enter the edges (u v):\n");
//     for (int i = 0; i < edges; i++) {
//         scanf("%d%d", &v1, &v2);
//         adj[v1][v2] = 1;
//         adj[v2][v1] = 1; // For undirected graph
//     }

//     printf("Enter the starting vertex: ");
//     scanf("%d", &start);

//     // Initialize visited array
//     for (int i = 0; i < n; i++)
//         visited[i] = 0;

//     printf("DFS Traversal: ");
//     DFS(start);

//     return 0;
// }
