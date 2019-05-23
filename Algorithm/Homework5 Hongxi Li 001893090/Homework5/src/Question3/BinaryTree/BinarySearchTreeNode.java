package Question3.BinaryTree;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/15/19 10:49 PM
 */
public class BinarySearchTreeNode {
    private int key;//结点的数据
    private BinarySearchTreeNode left;//指向左孩子结点
    private BinarySearchTreeNode right;//指向左孩子结点

    public BinarySearchTreeNode(int key) {
        this.key = key;
        this.left = null;
        this.right =null;
    }

    public int getKey() {
        return key;
    }

    public void setKey(int key) {
        this.key = key;
    }

    public BinarySearchTreeNode getLeft() {
        return left;
    }

    public void setLeft(BinarySearchTreeNode left) {
        this.left = left;
    }

    public BinarySearchTreeNode getRight() {
        return right;
    }

    public void setRight(BinarySearchTreeNode right) {
        this.right = right;
    }
}
