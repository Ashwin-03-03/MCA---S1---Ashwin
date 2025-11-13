#include <stdio.h>
#include <stdlib.h>

// Define the node structure
typedef struct Node {
    int data;
    struct Node* left;
    struct Node* right;
} Node;

// Create a new node with given data
Node* createNode(int data) {
    Node* newNode = malloc(sizeof(Node));
    if (!newNode) {
        printf("Memory allocation error\n");
        exit(1);
    }
    newNode->data = data;
    newNode->left = newNode->right = NULL;
    return newNode;
}

// Insert data into the BST and return the root pointer
Node* insert(Node* root, int data) {
    if (root == NULL) 
        return createNode(data);

    if (data < root->data)
        root->left = insert(root->left, data);
    else if (data > root->data)
        root->right = insert(root->right, data);

    return root;  // unchanged if data == root->data
}

// Inorder traversal to print the BST (sorted order)
void inorder(Node* root) {
    if (root == NULL) return;
    inorder(root->left);
    printf("%d ", root->data);
    inorder(root->right);
}

// Find the minimum value node in a subtree (used for case 3)
Node* findMin(Node* node) {
    Node* current = node;
    while (current && current->left != NULL)
        current = current->left;
    return current;
}

// Delete a node from BST
Node* deleteNode(Node* root, int key) {
    if (root == NULL)
        return root;

    // Traverse to find the node
    if (key < root->data)
        root->left = deleteNode(root->left, key);
    else if (key > root->data)
        root->right = deleteNode(root->right, key);
    else {
        // === CASE 1 & CASE 2 ===
        if (root->left == NULL) {
            Node* temp = root->right;
            free(root);
            return temp;
        } 
        else if (root->right == NULL) {
            Node* temp = root->left;
            free(root);
            return temp;
        }

        // === CASE 3: Node with two children ===
        Node* temp = findMin(root->right);  // inorder successor
        root->data = temp->data;            // copy successor’s data
        root->right = deleteNode(root->right, temp->data); // delete successor
    }

    return root;
}

int main() {
    Node* root = NULL;

    int values[] = {50, 30, 20, 40, 70, 60, 80};
    int n = sizeof(values)/sizeof(values[0]);

    // Insert values into BST
    for (int i = 0; i < n; i++)
        root = insert(root, values[i]);

    printf("Inorder traversal of BST: ");
    inorder(root);
    printf("\n");

    // Delete a few nodes
    root = deleteNode(root, 20);  // Case 1: Leaf node
    root = deleteNode(root, 30);  // Case 2: One child
    root = deleteNode(root, 50);  // Case 3: Two children

    printf("Inorder after deletions: ");
    inorder(root);
    printf("\n");

    return 0;
}
