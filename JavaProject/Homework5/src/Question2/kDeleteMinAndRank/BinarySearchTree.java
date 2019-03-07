package Question2.kDeleteMinAndRank;

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
    BinarySearchTreeNode find(BinarySearchTreeNode root, int data) {
        if (root == null)
            return null;//查询失败
        if (data < root.getData())
            return find(root.getLeft(),data);//在左子树中继续查找
        else if (data > root.getData())
            return find(root.getRight(),data);//在右子树中继续查找
        else
            return root;//查找成功， 返回找到的结点的地址
    }

    //查找元素：非递归方法
    BinarySearchTreeNode iterFind(BinarySearchTreeNode root, int data) {
        while (root != null) {
            if (data < root.getData())
                root = root.getLeft();//向左子树中移动， 继续查找
            else if (data > root.getData())
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
    BinarySearchTreeNode insert(BinarySearchTreeNode root, int data) {
        if (root == null)
            root = new BinarySearchTreeNode(data);//若原树为空， 生成并返回一个结点的二叉搜索树
        else {
            if (data < root.getData())     //开始找要插入元素的位置
                root.setLeft(insert(root.getLeft(),data));//递归插入左子树
            else if (data > root.getData())
                root.setRight(insert(root.getRight(),data));//递归插入右子树
        }
        return root;
    }

    //删除元素
    BinarySearchTreeNode delete(BinarySearchTreeNode root, int data) {
        BinarySearchTreeNode temp;
        if (root == null)
            System.out.println("要删除的元素未找到");
        else if (data < root.getData())
            root.setLeft(delete(root.getLeft(),data));//左子树递归删除
        else if (data > root.getData())
            root.setRight(delete(root.getRight(),data));//右子树递归删除
        else {    //找到要删除的结点
            if (root.getLeft() != null && root.getRight() != null) { //被删除结点有左右两个子结点
                temp = findMin(root.getRight());//在右子树中找最小的元素填充删除结点
                root.setData(temp.getData());
                root.setRight(delete(root.getRight(),root.getData()));//在删除结点的右子树中删除最小元素
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
        System.out.print(root.getData() + " ");//访问根结点
        InOrderRecursive(root.getRight());//中序遍历其右子树
    }

    //以下函数调用相应的方法
    public void callFindMin() {
        BinarySearchTreeNode cur = findMin(root);
        System.out.println("\nThe smallest one：" + cur.getData());
    }

    public void callIterFindMin() {
        BinarySearchTreeNode cur = iterFindMin(root);
        System.out.println("\nThe smallest one：" + cur.getData());
    }

    public void callFindMax() {
        BinarySearchTreeNode cur = findMax(root);
        System.out.println("\nThe biggest one：" + cur.getData());
    }

    public void callIterFindMax() {
        BinarySearchTreeNode cur = iterFindMax(root);
        System.out.println("\nThe biggest one：" + cur.getData());
    }

    public void callInsert(int data) {
        root = insert(root, data);
    }

    public void callDelete(int data) {
        root = delete(root, data);
    }

    public void callInOrderRecursive() {
        InOrderRecursive(root);
    }


//    /**
//     * 从二分搜索树中删除最小 key 所在的节点
//     */
//    public void removeMin() {
//        if (root != null) {
//            root = removeMin(root);
//        }
//    }
//
//    /**
//     * 删除以 node 为根的二分搜索树中的最小的节点
//     * 返回删除节点后新的二分搜索树的根
//     * @param root
//     * @return
//     */
//    private BinarySearchTreeNode removeMin(BinarySearchTreeNode root) {
//        if (root.getLeft() == null) {
//            // 就是删除这个节点 node
//            BinarySearchTreeNode rightNode = root.getRight();
//            root.right = null;
//            count--;
//            return rightNode;
//        }
//        root.getLeft() = removeMin(root.getLeft());
//        return root;
//    }

}
