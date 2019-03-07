package Question2.jBinaryTree;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/15/19 10:50 PM
 */
public class BinarySearchTreeTest {
    public static void main(String[] args) {
        BinarySearchTree tree = new BinarySearchTree();
        /* 创建如下的二叉搜索树
        * Level Travelal
        */

        tree.callInsert(3);
        tree.callInsert(7);
        tree.callInsert(9);
        tree.callInsert(23);
        tree.callInsert(45);
        tree.callInsert(1);
        tree.callInsert(5);
        tree.callInsert(14);
        tree.callInsert(55);
        tree.callInsert(24);
        tree.callInsert(13);
        tree.callInsert(11);
        tree.callInsert(8);
        tree.callInsert(19);
        tree.callInsert(4);
        tree.callInsert(31);
        tree.callInsert(35);
        tree.callInsert(56);

//        tree.find();
        System.out.println("InOrder is：");
        tree.callInOrderRecursive();//2 3 4 5 6 7 8
        tree.callFindMin();//最小元素为：2
        tree.callFindMax();//最大元素为：8
        System.out.println("\nDelete 2");
        tree.callDelete(8);
        System.out.println("Now InOrder is ：");
        tree.callInOrderRecursive();//3 4 5 6 7 8
        tree.callIterFindMin();//最小元素为：3
        tree.callIterFindMax();//最大元素为：8
    }
}
