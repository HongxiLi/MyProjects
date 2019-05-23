package Question2.kDeleteMinAndRank;

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
        tree.callInOrderRecursive();
        tree.callFindMin();
        tree.callFindMax();
        System.out.println("\nDelete 2");
        tree.callDelete(8);
        System.out.println("Now InOrder is ：");
        tree.callInOrderRecursive();
        tree.callIterFindMin();
        tree.callIterFindMax();
    }
}
