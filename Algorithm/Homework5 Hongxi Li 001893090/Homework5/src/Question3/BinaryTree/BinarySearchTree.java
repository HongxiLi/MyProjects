package Question3.BinaryTree;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/15/19 9:50 PM
 */
public class BinarySearchTree {
    private BinarySearchTreeNode root;//根结点

    public BinarySearchTree() {
        this.root = null;
    }

    //查找元素：递归方法
    BinarySearchTreeNode find(BinarySearchTreeNode root, int key) {
        if (root == null)
            return null;//查询失败
        if (key < root.getKey())
            return find(root.getLeft(),key);//在左子树中继续查找
        else if (key > root.getKey())
            return find(root.getRight(),key);//在右子树中继续查找
        else
            return root;//查找成功， 返回找到的结点的地址
    }

    //查找元素：非递归方法
    BinarySearchTreeNode iterFind(BinarySearchTreeNode root, int key) {
        while (root != null) {
            if (key < root.getKey())
                root = root.getLeft();//向左子树中移动， 继续查找
            else if (key > root.getKey())
                root = root.getRight();//向右子树中移动， 继续查找
            else
                return root;//查找成功， 返回找到的结点的地址
        }
        return null;//查询失败
    }

    //查找最小元素：递归方法 (最小元素一定是在树的最左分枝的端结点上)
    BinarySearchTreeNode findMin(BinarySearchTreeNode root) {
        if (root == null)
            return null;//空的二叉搜索树，返回null
        else if (root.getLeft() == null)
            return root;//找到最左叶结点并返回
        else
            return findMin(root.getLeft());//沿左分支继续查找
    }

    //查找最小元素：非递归方法 (最小元素一定是在树的最左分枝的端结点上)
    BinarySearchTreeNode iterFindMin(BinarySearchTreeNode root) {
        if (root == null)
            return null;//空的二叉搜索树，返回null
        while (root.getLeft() != null)
            root = root.getLeft();//沿左分支继续查找
        return root;//找到最左叶结点并返回
    }

    //查找最大元素：递归方法 (最大元素一定是在树的最右分枝的端结点上)
    BinarySearchTreeNode findMax(BinarySearchTreeNode root) {
        if (root == null)
            return null;//空的二叉搜索树，返回null
        else if (root.getRight() == null)
            return root;//找到最右叶结点并返回
        else
            return findMax(root.getRight());//沿右分支继续查找
    }

    //查找最大元素：非递归方法 (最大元素一定是在树的最右分枝的端结点上)
    BinarySearchTreeNode iterFindMax(BinarySearchTreeNode root) {
        if (root == null)
            return null;//空的二叉搜索树，返回null
        while (root.getRight() != null)
            root = root.getRight();//沿右分支继续查找
        return root;//找到最右叶结点并返回
    }

    //插入元素
    BinarySearchTreeNode insert(BinarySearchTreeNode root, int key) {
        if (root == null)
            root = new BinarySearchTreeNode(key);//若原树为空， 生成并返回一个结点的二叉搜索树
        else {
            if (key < root.getKey())     //开始找要插入元素的位置
                root.setLeft(insert(root.getLeft(),key));//递归插入左子树
            else if (key > root.getKey())
                root.setRight(insert(root.getRight(),key));//递归插入右子树
        }
        return root;
    }

    //删除元素
    BinarySearchTreeNode delete(BinarySearchTreeNode root, int key) {
        BinarySearchTreeNode temp;
        if (root == null)
            System.out.println("要删除的元素未找到");
        else if (key < root.getKey())
            root.setLeft(delete(root.getLeft(),key));//左子树递归删除
        else if (key > root.getKey())
            root.setRight(delete(root.getRight(),key));//右子树递归删除
        else {    //找到要删除的结点
            if (root.getLeft() != null && root.getRight() != null) { //被删除结点有左右两个子结点
                temp = findMin(root.getRight());//在右子树中找最小的元素填充删除结点
                root.setKey(temp.getKey());
                root.setRight(delete(root.getRight(),root.getKey()));//在删除结点的右子树中删除最小元素
            }else {   //被删除结点有一个或无子结点
                temp = root;
                if (root.getLeft() == null)  //有右孩子或无子结点
                    root = root.getRight();
                else if (root.getRight() == null) //有左孩子或无子结点
                    root = root.getLeft();
                temp = null;
            }
        }
        return root;
    }

    //中序遍历：递归方法  (中序遍历二叉搜索树时，将得到一个有序表)
    void InOrderRecursive(BinarySearchTreeNode root) {
        if(root == null)
            return;
        InOrderRecursive(root.getLeft());//中序遍历其左子树
        System.out.print(root.getKey() + " ");//访问根结点
        InOrderRecursive(root.getRight());//中序遍历其右子树
    }

    void Rank(BinarySearchTreeNode root) {
        if(root == null)
            return;
        Rank(root.getLeft());//中序遍历其左子树
        System.out.print(root.getKey() + " ");//访问根结点
        Rank(root.getRight());//中序遍历其右子树
    }

    //以下函数调用相应的方法
    public void callFindMin() {
        BinarySearchTreeNode cur = findMin(root);
        System.out.println("\nThe smallest one：" + cur.getKey());
    }

    public void callIterFindMin() {
        BinarySearchTreeNode cur = iterFindMin(root);
        System.out.println("\nThe smallest one：" + cur.getKey());
    }

    public void callFindMax() {
        BinarySearchTreeNode cur = findMax(root);
        System.out.println("\nThe biggest one：" + cur.getKey());
    }

    public void callIterFindMax() {
        BinarySearchTreeNode cur = iterFindMax(root);
        System.out.println("\nThe biggest one：" + cur.getKey());
    }

    public void callInsert(int key) {
        root = insert(root, key);
    }

    public void callDelete(int key) {
        root = delete(root, key);
    }

    public void callInOrderRecursive() {
        InOrderRecursive(root);
    }

    public void callRank() {
        Rank(root);
    }
}
