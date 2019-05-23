package q3;

import javafx.util.Pair;

import java.util.ArrayList;
import java.util.Random;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-12 16:38
 */
public class Main {
    private static Node A = new Node("A");
    private static Node B = new Node("B");
    private static Node C = new Node("C");
    private static Node D = new Node("D");
    private static Node E = new Node("E");

    private static ArrayList<Node> allNodes = new ArrayList<>();

    private static ArrayList<Chromosome> betterChromosomes = new ArrayList<>();

    private static ArrayList<Chromosome> possibleChromosomes = new ArrayList<>();

    private static ArrayList<Chromosome> currentPopulation = new ArrayList<>();

    private static ArrayList<Chromosome> mutatingChromosomes = new ArrayList<>();

    private static int evolutionCycleAmount = 1;
    private static int populationSize = 100;

    public static void main(String[] args) {

        allNodes.add(A);
        allNodes.add(B);
        allNodes.add(C);
        allNodes.add(D);
        allNodes.add(E);

        connectNodes(A, B, 7);
        connectNodes(A, C, 6);
        connectNodes(A, D, 3);
        connectNodes(A, E, 10);
        connectNodes(B, C, 4);
        connectNodes(B, D, 9);
        connectNodes(B, E, 8);
        connectNodes(C, D, 7);
        connectNodes(C, E, 11);
        connectNodes(D, E, 5);

        for (int i = 0; i < evolutionCycleAmount; i++) {

            fillCurrentPopulation(currentPopulation);
            sortPopulation(currentPopulation);

            for (int j = 1; j < currentPopulation.size(); j++) {
                possibleChromosomes.add(crossover(currentPopulation.get(j - 1), currentPopulation.get(j)));
            }
            sortPopulation(possibleChromosomes);

            betterChromosomes.addAll(currentPopulation);
            betterChromosomes.addAll(possibleChromosomes);
            currentPopulation.clear();
            possibleChromosomes.clear();

            for (Chromosome chromosome :
                    betterChromosomes) {
                mutatingChromosomes.add(mutation(chromosome));
            }

            betterChromosomes.addAll(mutatingChromosomes);
            mutatingChromosomes.clear();

            sortPopulation(betterChromosomes);
        }


        for (Chromosome chromosome :
                betterChromosomes) {
            System.out.println(chromosome.toString());
        }
    }

    private static Chromosome crossover(Chromosome chromosome1, Chromosome chromosome2) {
        int rightBorder = new Random().nextInt(chromosome1.getNodes().size());
        while (rightBorder==0){
            rightBorder = new Random().nextInt(chromosome1.getNodes().size());
        }
        int leftBorder = new Random().nextInt(rightBorder);
        ArrayList<Node> sameNodes = new ArrayList<>();
        ArrayList<Integer> crossoverNodePositions = new ArrayList<>();

        for (int i = leftBorder; i < rightBorder; i++) {
            int chromosome2NodeIndex = chromosome2.getNodes().indexOf(chromosome1.getNodes().get(i));
            if (chromosome2NodeIndex > leftBorder && chromosome2NodeIndex < rightBorder) {
                sameNodes.add(chromosome1.getNodes().get(i));
                crossoverNodePositions.add(i);
            }
        }

        Chromosome chromosome = new Chromosome();
        for (int i = 0; i < chromosome1.getNodes().size(); i++) {
            if (!sameNodes.contains(chromosome1.getNodes().get(i))) {
                chromosome.addNode(chromosome1.getNodes().get(i));
            }
        }

        boolean[] taken = new boolean[sameNodes.size()];

        for (Integer crossoverNodePosition : crossoverNodePositions) {
            Node nodeToAdd;
            int nodeIndexToTake = new Random().nextInt(sameNodes.size());

            while (taken[nodeIndexToTake]) {
                nodeIndexToTake = new Random().nextInt(sameNodes.size());
            }

            taken[nodeIndexToTake] = true;
            nodeToAdd = sameNodes.get(nodeIndexToTake);
            chromosome.getNodes().add(crossoverNodePosition, nodeToAdd);
        }

        return chromosome;
    }

    private static void fillCurrentPopulation(ArrayList<Chromosome> population) {
        for (int i = 0; i < populationSize; i++) {
            population.add(generateChromosome());
        }
    }

    private static void sortPopulation(ArrayList<Chromosome> population) {
        population.sort((o1, o2) -> {
            if (o1.getDistance() == 0)
                o1.setDistance(calculateDistance(o1));
            if (o2.getDistance() == 0)
                o2.setDistance(calculateDistance(o2));
            return Integer.compare(o1.getDistance(), o2.getDistance());
        });

        while (population.size()>populationSize+1){
            population.remove(populationSize+1);
        }
    }

    private static int calculateDistance(Chromosome chromosome) {
        int distance = 0;
        for (int i = 1; i < chromosome.getNodes().size(); i++) {
            Node pastNode = chromosome.getNodes().get(i - 1);
            Node thisNode = chromosome.getNodes().get(i);
            int indexOfPastNodeInAllNodes = allNodes.indexOf(pastNode);
            for (Pair<Node, Integer> pair :
                    allNodes.get(indexOfPastNodeInAllNodes).getConnections()) {
                if (thisNode == pair.getKey()) {
                    distance += pair.getValue();
                }
            }
        }
        return distance;
    }

    private static Chromosome generateChromosome() {
        Chromosome chromosome = new Chromosome();
        boolean[] taken = new boolean[allNodes.size()];
        for (int i = 0; i < allNodes.size(); i++) {

            int nextGeneToTake = new Random().nextInt(allNodes.size());
            while (taken[nextGeneToTake]) {
                nextGeneToTake = new Random().nextInt(allNodes.size());
            }
            chromosome.addNode(allNodes.get(nextGeneToTake));
            taken[nextGeneToTake] = true;
        }
        return chromosome;
    }

    private static Chromosome mutation(Chromosome chromosome) {
        return crossover(chromosome, chromosome);
    }

    private static void connectNodes(Node starting, Node ending, int weight) {
        starting.addNode(ending, weight);
        ending.addNode(starting, weight);
    }
}
