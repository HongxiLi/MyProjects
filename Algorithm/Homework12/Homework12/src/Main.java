import java.util.Scanner;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-18 17:20
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {


        int match = 1;
        int mismatch = -1;
        int gap = -2;


        String sequence1 = "TACGGGTAT";
        String sequence2 = "GGACGTACG";


        NeedlemanWunsch aligner = new NeedlemanWunsch(sequence1, sequence2, match, mismatch, gap);
        String[] alignment = aligner.getAlignment();

        System.out.println("Sequence 1: "+alignment[0]);
        System.out.println("Sequence 2: "+alignment[1]);

        aligner.ensureTableIsFilledIn();

        aligner.printScoreTable();

    }

}
